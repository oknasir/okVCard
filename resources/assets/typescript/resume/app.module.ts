import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { routes } from './app.routing';

import { AppComponent } from './app.component';
import { PageNotFoundComponent } from "./components/page-not-found/page-not-found.component";
import { FirstComponent } from "./components/first/first.component";
import { SecondComponent } from "./components/second/second.component";
import { ProgressBar } from "./components/ui/progress-bar/progress-bar.component";
import { TilledIcon } from "./components/ui/tilled-icon/tilled-icon.component";

import { FileUploadService } from "./services/file-upload/file-upload.service";

@NgModule({
    imports: [
        BrowserModule,
        FormsModule,
        HttpModule,
        NgbModule,
        RouterModule.forRoot(routes)
    ],
    declarations: [
        AppComponent,
        PageNotFoundComponent,
        FirstComponent,
        SecondComponent,
        ProgressBar,
        TilledIcon
    ],
    providers: [
        FileUploadService
    ],
    bootstrap:[
        AppComponent
    ]
})
export class AppModule {}