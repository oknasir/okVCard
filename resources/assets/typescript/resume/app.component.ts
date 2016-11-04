import {Component, HostListener, ViewChild, ElementRef} from '@angular/core';
import {Router} from '@angular/router'

@Component({
    'selector': 'ok-resume',
    'templateUrl': '/resume/header'
})
export class AppComponent {

    @ViewChild('menu') menu: any;

    @HostListener('document:keydown', ['$event'])
    keydown(e: KeyboardEvent) {

        if (e.which in this.keyBuffer) {

            this.keyBuffer[e.which] = true;

            console.log(e.which);

            if (this.timeoutId)
                window.clearTimeout(this.timeoutId);

            this.timeoutId = window.setTimeout( () => { this.resetKeyDetect(); }, 800);

            var keybind = this.getKeyDetect();

            if (typeof keybind == 'string') {

                if (keybind !== 'menu')
                    this.router.navigateByUrl('/' + keybind);

                this.resetKeyDetect();
                e.preventDefault();

            }

        }

    }

    /**
     * @type ZoneTask
     */
    private timeoutId: any;

    /**
     * @type {Array}
     */
    private keyBuffer: {};

    constructor (private router: Router) {

        this.keyBuffer = {
            17: false, // `Control` key
            69: false, // `e` for edit page
            72: false, // `h` for home page
            77: false, // `m` for menu open
            88: false  // `x` for menu close
        };

    }

    /**
     * get page to redirect from multiple keys
     */
    private getKeyDetect():any {

        if (this.keyBuffer[17]) {

            if (this.keyBuffer[69]) return 'edit';

            else if (this.keyBuffer[72]) return '';

            else if (this.keyBuffer[77]) {
                if (this.menu.toCloseIcon)
                    this.menu.openMenu(true);
                return 'menu';
            }

            else if (this.keyBuffer[88]) {
                if (!this.menu.toCloseIcon)
                    this.menu.closeMenu(true);
                return 'menu';
            }

        } else
            return false;
    }

    /**
     * Reset keybinding detection for multiple keys
     */
    private resetKeyDetect():void {

        this.keyBuffer[17] = false;
        this.keyBuffer[69] = false;
        this.keyBuffer[72] = false;
        this.keyBuffer[77] = false;
        this.keyBuffer[88] = false;

        window.clearTimeout(this.timeoutId);
    }

    /**
     * Event listner for menu
     */
    public onNotify(close:boolean):void {
        console.log('close:',close);
    }
}
