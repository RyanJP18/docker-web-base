import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/HomeView.vue';


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [ 
        { path: '', name: 'home', component: HomeView }
    ]
});

router.beforeEach(async (to) => {
    const publicPages = ['']; // /forgot-password, '/sign-up' etc.
    const authRequired = !publicPages.includes(to.path);
    
    const authed = true; // Replace with a real auth mechanism

    if (authRequired) {
        if (!authed) {
            return '/'; // Replace with sign in page
        }
    } else {
        return '/'; // Replace with default landing page
    }   
});

export default router;