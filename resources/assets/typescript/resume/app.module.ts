import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { RouterModule } from '@angular/router';
import { NgSemanticModule } from 'ng-semantic';

import { routes } from './app.routing';

import { AppComponent } from './app.component';
import { PageNotFoundComponent } from "./components/page-not-found/page-not-found.component";
import { HomeComponent } from "./components/home.component";
import { SecondComponent } from "./components/second/second.component";
import { ProgressBar } from "./components/ui/progress-bar/progress-bar.component";
import { TilledIcon } from "./components/ui/tilled-icon/tilled-icon.component";

import { FileUploadService } from "./services/file-upload/file-upload.service";

@NgModule({
    imports: [
        BrowserModule,
        FormsModule,
        HttpModule,
        NgSemanticModule,
        RouterModule.forRoot(routes)
    ],
    declarations: [
        AppComponent,
        PageNotFoundComponent,
        HomeComponent,
        SecondComponent,
        ProgressBar,
        TilledIcon
    ],
    providers: [
        FileUploadService
    ],
    bootstrap:[
        AppComponent
    ],
    schemas: [ CUSTOM_ELEMENTS_SCHEMA ],
})
export class AppModule {}
