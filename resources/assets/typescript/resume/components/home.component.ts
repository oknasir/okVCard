import {Component, Inject, ElementRef} from '@angular/core';
import { Router } from '@angular/router';
import { FileUploadService } from '../services/file-upload/file-upload.service';

declare var jQuery: any;

@Component({
    'selector': 'home',
    'templateUrl': '/resume/home'
})
export class HomeComponent {
    /**
     * @type FileUploadService
     */
    private fileUploadService: FileUploadService;

    /**
     * @type {string}
     */
    private redirectRoute: string = '/edit';

    /**
     * @type {Array}
     */
    private files: File[] = [];

    /**
     * @type {Router}
     */
    private router: Router;

    /**
     * Upload progress for files
     *
     * @type {number}
     */
    private uploadProgress: number = 0;

    /**
     * progress-bar Directive load condition
     *
     * @type {boolean}
     */
    private progressBarVisibility: boolean = false;

    /**
     * @type {string}
     */
    private uploadRoute: string = '/api/upload-file';

    constructor (
        @Inject(FileUploadService) fileUploadService: FileUploadService,
        @Inject(Router) router: Router,
        private _elRef: ElementRef
    ) {
        this.fileUploadService = fileUploadService;
        this.router = router;
    }

    public run (): void {}

    /**
     * @param fileInput
     */
    public filesSelectionHandler (fileInput: any){
        let FileList: FileList = fileInput.target.files;

        for (let i = 0, length = FileList.length; i < length; i++) {
            this.files.push(FileList.item(i));
        }

        jQuery(this._elRef.nativeElement).find('input').addClass('test-class');

        this.progressBarVisibility = true;
    }

    private filesUpload (i) {
        this.fileUploadService
            .upload(this.uploadRoute, this.files[i])
            .subscribe(data => {
                var complete = i == (this.files.length - 1);
                if (complete)
                    this.uploadProgress = 100;
                else
                    this.uploadProgress += 100 / this.files.length;
                setTimeout(() => {
                    console.log('Message from server:', data);
                    if (complete)
                        this.router.navigate([this.redirectRoute]);
                    else
                        this.filesUpload(i + 1);
                }, 500);
            });
    }

    public filesUploadHandler () {
        this.filesUpload(0);
    }

}
