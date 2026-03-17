<script setup lang="ts">
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import {
  ResizableHandle,
  ResizablePanel,
  ResizablePanelGroup,
} from '@/components/ui/resizable'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Admin',
        href: '/dashboard',
    },
    {
        title: 'Companies',
        href: '/admin/companies',
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-8">
            <Head title="Companies" />
            <Table class="w-full">
                <TableHeader>
                    <TableRow>
                        <TableHead class="w-[300px]">Company</TableHead>
                        <TableHead class="w-[300px]">Type</TableHead>
                        <TableHead class="text-right">Action</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow>
                        <TableCell class="font-medium">LETSHUOER</TableCell>
                        <TableCell class="font-medium">Main</TableCell>
                        <TableCell class="text-right">Edit</TableCell>
                    </TableRow>
                    <TableRow>
                        <TableCell class="font-medium">Livezoner 41</TableCell>
                        <TableCell class="font-medium">OEM / ODM</TableCell>
                        <TableCell class="text-right">Edit</TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>
    </AppLayout>
</template>
