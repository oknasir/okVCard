import { Component } from '@angular/core';

@Component({
    'selector': 'ok-resume',
    'templateUrl': '/resume/header'
})
export class AppComponent {
    constructor () {}

    public onNotify(close:boolean):void {
        console.log('close:',close);
    }
}
