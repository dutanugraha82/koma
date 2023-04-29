import Home from '../views/Home';
import About from '../views/About';
import Directory from '../views/Directory';
import Feature from '../views/Feature';

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/directory',
            name: 'directory',
            component: Directory,
        },
        {
            path: '/feature',
            name: 'feature',
            component: Feature,
        }
    ]
}