var baseHelper = (function($) {
  var myFunc = function(text) {
    alert(text);
  }

  // public functions
  return {
    //main function
    init: function() {
      //not inuse this is a standalone helper
      //initialize here something.
    },

    //some helper function test jnpl
    doSomeStuff: function(text) {
      myFunc(text);
    },

    /**
     * This will Convert Object String into Real JS Obejct
     */
    toJson: function(json_data) {
      var response;
      // Test if it is string JSON data
      if (/^\{/.test(json_data) && /\}$/.test(json_data)) {
        try {
          response = JSON.parse(json_data);
        } catch (e) {
          response = json_data;
        }
      } else {
        response = json_data;
      }

      if (response) {
        return response;
      } else {
        return null;
      }
    },

    /**
     * This will Convert Object into String
     */
    toString: function(json_data) {
      var response;
      if (typeof(json_data) == 'function') {
        return null;
      }
      // Test if it is string JSON data
      if (typeof(json_data) == 'object') {
        try {
          response = JSON.stringify(json_data);
        } catch (e) {
          response = json_data;
        }
      } else {
        response = json_data;
      }

      return response;
    },

    /**
     * coockie function
     */
    createCookie: function(name, value, days) {
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
        ret_val = true;
      } else {
        var expires = "";
        ret_val = false;
      }
      document.cookie = name + "=" + this.toString(value) + expires + "; path=/";
      return ret_val;
    },

    readCookie: function(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return this.toJson(c.substring(nameEQ.length, c.length));
      }
      return null;
    },

    eraseCookie: function(name) {
      document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
    },
    /**
     * coockie function
     */

    /**
     * check if not empty
     */
    isNotEmpty: function(v, param) {
      var v = $.trim(v);
      return v != null && v != "N/A" && v != "" && v != "No" && v != 0 && v != "undefined" && v != "NaN" && v != "NA" && v != " " && v != "n/a" && v != "false" && v != "FALSE" && v != "False" && v != "NULL" && v != "null";
    },

    /**
     * check if empty
     */
    isEmpty: function(v) {
      var v = $.trim(v);
      return v == null || v == "N/A" || v == "" || v == "No" || v == 0 || v == "undefined" || v == "NaN" || v == "NA" || v == " " || v == "n/a" || v == "false" || v == "FALSE" || v == "False" || v == "NULL" || v == "null";
    },

    /**
     * check if email
     */
    isEmail: function(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    },

    /**
     * check if number
     */
    isNumber: function(evt) {
      evt = (evt) ? evt : window.event;

      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    },

    isFloat: function(el, evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      var number = el.value.split('.');
      if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      //just one dot
      if (number.length > 1 && charCode == 46) {
        return false;
      }
      return true;
    },

    /**
     * check if alpha characters only (a-z/A-Z)
     */
    isText: function(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      // a-z
      if (charCode >= 65 || charCode <= 90) return true;
      // space, shift, capslock
      if (charCode == 32 || charCode == 16 || charCode == 20) {
        return true;
      }
      // prohibit numbers
      if (charCode > 31 && (charCode >= 48 || charCode <= 57)) {
        return false;
      }
      return false;
    },

    /**
     * check if phonenumber
     */
    isPhoneNumber: function(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode == 43 || charCode == 37 || charCode == 39) { //if + sign
        return true;
      } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    },

    /**
     * open tab for adblock
     */
    openTab: function(url, param) {
      param = param || null;
      if (this.isNotEmpty(param)) {
        if (typeof encodeURIComponent != 'undefined') {
          final_url = encodeURIComponent(url);
        } else {
          final_url = url;
        }
        window.open(final_url, "_blank");
      } else {
        window.open(url, "_blank");
      }
      window.focus();
    },

    /**
     * storage function
     */
    createStorage: function(name, value, param) {
      if (localStorage) {
        param = param || "local";
        value = this.toString(value);
        switch (param) {
          case 'local':
            localStorage.setItem(name, value);
            break;
          case 'session':
            sessionStorage.setItem(name, value);
            break;
          default:
            localStorage.setItem(name, value);
        }
        ret_val = true;
      } else {
        ret_val = false;
      }
      return ret_val;
    },

    readStorage: function(name, param) {
      if (localStorage) {
        param = param || "local";
        switch (param) {
          case 'local':
            ret_val = localStorage.getItem(name);
            break;
          case 'session':
            ret_val = sessionStorage.getItem(name);
            break;
          default:
            ret_val = localStorage.getItem(name);
        }
      } else {
        ret_val = null;
      }
      return this.toJson(ret_val);
    },

    eraseStorage: function(name, param) {
      if (localStorage) {
        param = param || "local";
        switch (param) {
          case 'local':
            localStorage.removeItem(name);
            break;
          case 'session':
            sessionStorage.removeItem(name);
            break;
          default:
            localStorage.removeItem(name);
        }
        ret_val = true;
      } else {
        ret_val = false;
      }
      return ret_val;
    },

    clearStorage: function(param) {
      if (localStorage) {
        switch (param) {
          case 'local':
            localStorage.clear();
            break;
          case 'session':
            sessionStorage.clear();
            break;
          default:
            localStorage.clear();
            sessionStorage.clear();
        }
        ret_val = true;
      } else {
        ret_val = false;
      }
      return ret_val;
    },

    isMobile: function() {
      if (window.innerWidth <= 760) {
        return true;
      } else {
        return false;
      }
    },

    isIpad: function() {
      if (window.innerWidth <= 1024) {
        return true;
      } else {
        return false;
      }
    },

    UnformatCurrency: function(cur) {
      cur = cur.toString().replace(/\D/g, "");
      if (this.isNotEmpty(cur)) {
        return cur;
      } else {
        return 0;
      }
    },

    FormatCurrency: function(cur) {
      cur = this.UnformatCurrency(cur);
      if (this.isNotEmpty(cur)) {
        return cur;
      } else {
        return 0;
      }
    },

    checkIE: function() {
      var ua = window.navigator.userAgent;
      var msie = ua.indexOf("MSIE ");
      if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        return true;
      } else {
        return false;
      }
    },

    parseQueryString: function(str) {
      if (typeof str !== 'string') {
        return {};
      }

      str = str.trim().replace(/^(\?|#)/, '');

      if (!str) {
        return {};
      }

      return str.trim().split('&').reduce(function(ret, param) {
        var parts = param.replace(/\+/g, ' ').split('=');
        var key = parts[0];
        var val = parts[1];

        key = decodeURIComponent(key);
        // missing `=` should be `null`:
        // http://w3.org/TR/2012/WD-url-20120524/#collect-url-parameters
        val = val === undefined ? null : decodeURIComponent(val);

        if (!ret.hasOwnProperty(key)) {
          ret[key] = val;
        } else if (Array.isArray(ret[key])) {
          ret[key].push(val);
        } else {
          ret[key] = [ret[key], val];
        }

        return ret;
      }, {});
    },

    addZero: function(str) {
      if (String(str).length == 1) {
        str = "0" + str;
      }
      return str;
    },

    DateDiff: function(date1, date2) {
      if (this.isNotEmpty(date1) && this.isNotEmpty(date2)) {
        if (this.checkIE()) {
          var ieval1 = date1.split("-");
          var val1 = ieval1[1] + '/' + ieval1[2] + '/' + ieval1[0];

          var ieval2 = date2.split("-");
          var val2 = ieval2[1] + '/' + ieval2[2] + '/' + ieval2[0];
        } else {
          var val1 = date1;
          var val2 = date2;
        }

        var date1 = new Date(val1),
          date2 = new Date(val2);
        var datediff = date2.getTime() - date1.getTime();
        return (datediff / (24 * 60 * 60 * 1000));
      } else {
        return 0;
      }
    },

    pad: function(str, max) {
      str = str.toString();
      return str.length < max ? pad("0" + str, max) : str;
    },

    getUrlParameter: function(url) {
      url = url.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + url + "=([^&#]*)"),
        results = regex.exec(location.search);
      return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

  };
})(jQuery);
