import { Component, ElementRef, ViewChild, Output, EventEmitter } from '@angular/core';

declare var ease: any;
declare var Segment: any;

@Component({
    'selector': 'tilled-icon',
    'template': require('./tilled-icon.template.html')
})
export class TilledIcon {

    @ViewChild('pathA') pathA: ElementRef;
    @ViewChild('pathB') pathB: ElementRef;
    @ViewChild('pathC') pathC: ElementRef;

    private segmentA: any;
    private segmentB: any;
    private segmentC: any;

    ngAfterViewInit() {
        this.segmentA = new Segment(this.pathA.nativeElement, this.beginAC, this.endAC);
        this.segmentB = new Segment(this.pathB.nativeElement, this.beginB, this.endB);
        this.segmentC = new Segment(this.pathC.nativeElement, this.beginAC, this.endAC);
    }

    @Output() notify: EventEmitter<boolean> = new EventEmitter<boolean>();

    /* In animations (to close icon) */

    /**
     * @type {number}
     */
    private beginAC: number = 80;

    /**
     * @type {number}
     */
    private endAC: number = 320;

    /**
     * @type {number}
     */
    private beginB: number = 80;

    /**
     * @type {number}
     */
    private endB: number = 320;

    /**
     * @param s
     */
    private inAC (s: any) {
        s.draw('80% - 240', '80%', 0.3, {
            delay: 0.1,
            callback: () => {
                this.inAC2(s)
            }
        });
    }

    /**
     * @param s
     */
    private inAC2(s: any) {
        s.draw('100% - 545', '100% - 305', 0.6, {
            easing: ease.ease('elastic-out', 1, 0.3)
        });
    }

    /**
     * @param s
     */
    private inB(s: any) {
        s.draw(this.beginB - 60, this.endB + 60, 0.1, {
            callback: () => {
                this.inB2(s)
            }
        });
    }

    /**
     * @param s
     */
    private inB2(s: any) {
        s.draw(this.beginB + 120, this.endB - 120, 0.3, {
            easing: ease.ease('bounce-out', 1, 0.3),
            callback: () => {
                this.notify.emit(this.toCloseIcon);
            }
        });
    }

    /* Out animations (to burger icon) */

    /**
     * @param s
     */
    private outAC(s) {
        s.draw('90% - 240', '90%', 0.1, {
            easing: ease.ease('elastic-in', 1, 0.3),
            callback: () => {
                this.outAC2(s)
            }
        });
    }

    /**
     * @param s
     */
    private outAC2(s) {
        s.draw('20% - 240', '20%', 0.3, {
            callback: () => {
                this.outAC3(s)
            }
        });
    }

    /**
     * @param s
     */
    private outAC3(s) {
        s.draw(this.beginAC, this.endAC, 0.7, {
            easing: ease.ease('elastic-out', 1, 0.3)
        });
    }

    /**
     * @param s
     */
    private outB(s) {
        s.draw(this.beginB, this.endB, 0.7, {
            delay: 0.1,
            easing: ease.ease('elastic-out', 2, 0.4),
            callback: () => {
                this.notify.emit(this.toCloseIcon);
            }
        });
    }

    /**
     * @type {number}
     */
    public toCloseIcon: boolean = true;

    /**
     * Click function for toggle icon
     */
    public triggerTilled () {

        if (this.toCloseIcon) this.openMenu();
        else this.closeMenu();

        this.toCloseIcon = !this.toCloseIcon;
    }

    /**
     * open menu
     */
    public openMenu(trigger: boolean = false) {

        this.inAC(this.segmentA);
        this.inB(this.segmentB);
        this.inAC(this.segmentC);

        if (trigger) {
            this.toCloseIcon = false;
            console.log('openMenu called');
        }

    }

    /**
     * close menu
     */
    public closeMenu(trigger: boolean = false) {

        this.outAC(this.segmentA);
        this.outB(this.segmentB);
        this.outAC(this.segmentC);

        if (trigger) {
            this.toCloseIcon = true;
            console.log('closeMenu called');
        }

    }

}
