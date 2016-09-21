import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/delay';
import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class FileUploadService {
    private http: Http;

    constructor (http: Http) {
        this.http = http;
    }

    /**
     * @param requestUrl
     * @returns {Observable<{}>}
     */
    public upload (requestUrl: string, file): Observable<{}> {
        var fd = new FormData();
        fd.append('ng-upload', file);
        return this.http
            .post(requestUrl, fd)
            .map(FileUploadService.extractData);
    }

    /**
     * @param res
     * @returns {any}
     */
    private static extractData (res: Response): any {
        let body = res.json();

        return body.message || {};
    }
}
