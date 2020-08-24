(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/@websanova/vue-auth/drivers/auth/bearer.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@websanova/vue-auth/drivers/auth/bearer.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({

    request: function (req, token) {
        this.http.setHeaders.call(this, req, {
            Authorization: 'Bearer ' + token
        });
    },

    response: function (res) {
        var headers = this.http.getHeaders.call(this, res),
            token   = headers.Authorization || headers.authorization;

        if (token) {
            token = token.split(/Bearer:?\s?/i);

            return token[token.length > 1 ? 1 : 0].trim();
        }
    }
});

/***/ })

}]);