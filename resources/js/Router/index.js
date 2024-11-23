import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/Dashboard.vue';
import IslandList from '../components/IslandList.vue';
import AddressList from '../components/AddressList.vue';
import PatientList from '../components/PatientList.vue';
import NotFound from '../views/NotFound.vue';

const routes = [
    { path: '/', name: 'dashboard', component: Dashboard },
    { path: '/islands', name: 'islands', component: IslandList },
    { path: '/addresses', name: 'addresses', component: AddressList },
    { path: '/patients', name: 'patients', component: PatientList },
    { path: '/:pathMatch(.*)*', name: 'not-found', component: NotFound },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
