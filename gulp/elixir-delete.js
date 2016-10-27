/**
 * Use to control elements of elixir-delete
 * @date 9/29/2016
 * @author Nasir Mehmood <oknasir@gmail.com>
 */

const Elixir = require('laravel-elixir');
const remove = require('del');

var Task = Elixir.Task;

Elixir.extend('delete', function (path) {

    new Task('delete', function () {
        this.recordStep('Deleting files');
        return remove(path, {force:true});
    }, {
        src: {
            path: path
        },
        output: {
            path: `${process.cwd()}`
        }
    });

});
