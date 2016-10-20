import { Routes } from '@angular/router';
import { PageNotFoundComponent } from "./components/page-not-found/page-not-found.component";
import { HomeComponent } from "./components/home.component";
import { SecondComponent } from "./components/second/second.component";

export const routes: Routes = [
    {
        path: '',
        component: HomeComponent
    },
    {
        path: 'edit',
        component: SecondComponent
    },
    {
        path: '**',
        component: PageNotFoundComponent
    }
];
