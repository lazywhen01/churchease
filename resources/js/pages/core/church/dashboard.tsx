import Heading from '@/components/heading';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Dashboard',
    href: '/church/dashboard',
  },
];

export default function Index() {

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Dashboard" />

      <div className="px-4 py-6">
        <Heading title="Dashboard" description="Manage church dashboard here." />
      </div>
    </AppLayout>
  );
}
