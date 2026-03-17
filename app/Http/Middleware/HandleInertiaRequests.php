<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        // Get user data and assert user roles
        $user = $request->user();
        if (!empty($user)) {
            $user['is_admin'] = $user->isAdmin();
            $user['company'] = $user->companies()->first()?->id;
        }

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'auth' => [
                'user' => $user,
            ],
            'menuItems' => $user ? $this->getMenuItemsByUser($user) : [],
            'ziggy' => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'sidebarOpen' => ! $request->hasCookie('sidebar_state') || $request->cookie('sidebar_state') === 'true',
        ];
    }

    /**
     * Get the menu items based on the user's role.
     *
     * @param User $user
     * @return array<string, array<string, mixed>>
     */
    protected function getMenuItemsByUser(User $user): array
    {
        $menuItems = [
            [
                'label' => null,
                'items' => [
                    [
                        'label' => __('Overview'),
                        'icon' => 'mingcute:grid-line',
                        'href' => '/dashboard',
                    ],
                ]
            ]
        ];

        if ($user->is_admin) {
            $menuItems = array_merge($menuItems, [
                [
                    'label' => __('Admin'),
                    'items' => [
                        [
                            'label' => __('Orders'),
                            'href' => '/admin/orders',
                            'icon' => 'proicons:box',
                        ],
                        [
                            'label' => __('RMA'),
                            'href' => '/admin/rma',
                            'icon' => 'lsicon:sales-return-outline',
                        ],
                        [
                            'label' => __('Tours'),
                            'href' => '/admin/tours',
                            'icon' => 'mdi:flight',
                        ],
                        [
                            'label' => __('Users'),
                            'href' => '/admin/users',
                            'icon' => 'ph:users-light',
                        ],
                        [
                            'label' => __('Companies'),
                            'href' => '/admin/companies',
                            'icon' => 'pixel:tech-companies',
                        ],
                    ]
                ]
            ]);
        }

        if (!empty($user->company) && !$user->is_admin) {
            $menuItems[0]['items'] = array_merge($menuItems[0]['items'], 
                [
                    [
                        'label' => __('Orders'),
                        'href' => '/orders',
                        'icon' => 'proicons:box',
                    ],

                    // Uncomment the following lines if you want to include RMA and Tours in the menu for ODM or OEM partners
                    // [
                    //     'label' => __('RMA'),
                    //     'href' => '/rma',
                    //     'icon' => 'lsicon:sales-return-outline',
                    // ],
                    // [
                    //     'label' => __('Tours'),
                    //     'href' => '/tours',
                    //     'icon' => 'mdi:flight',
                    // ]
                ]
            );
        }

        if (empty($user->company)) {
            $menuItems[0]['items'] = array_merge_recursive($menuItems[0]['items'], [
                [
                    'label' => __('RMA'),
                    'href' => '/rma',
                    'icon' => 'lsicon:sales-return-outline',
                ],
                [
                    'label' => __('Tours'),
                    'href' => '/tours',
                    'icon' => 'mdi:flight',
                ]
            ]);
        }

        return $menuItems;
    }
}
