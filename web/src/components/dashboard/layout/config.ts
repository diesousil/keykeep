import type { NavItemConfig } from '@/types/nav';
import { paths } from '@/paths';

export const navItems = [
  { key: 'credentials', title: 'Credentials', href: paths.dashboard.overview, icon: 'lock' },
] satisfies NavItemConfig[];
