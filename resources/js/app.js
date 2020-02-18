/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    data() {
    	return {
      		newImage: null,
      		newLogo: null,
    	}
  	},
    methods: {
    	openFileImage() {
    		this.$refs.fileImage.click();
    	},
    	openFileLogo() {
    		this.$refs.fileLogo.click();
    	},
    	onFileImageChange(e) {
    		const file = e.target.files[0];
      		this.newImage = URL.createObjectURL(file);
    	},
    	onFileLogoChange(e) {
    		const file = e.target.files[0];
      		this.newLogo = URL.createObjectURL(file);
    	}
    }
});

