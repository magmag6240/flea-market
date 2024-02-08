/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/item_image.js ***!
  \************************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
var input_image = document.getElementById("item-image");
var item_image_preview = document.querySelector(".image-preview");
input_image.style.opacity = 0;
input_image.addEventListener("change", updateImageDisplay);
function updateImageDisplay() {
  while (item_image_preview.firstChild) {
    item_image_preview.removeChild(item_image_preview.firstChild);
  }
  var curFiles = input_image.files;
  if (curFiles.length === 0) {
    var para = document.createElement("p");
    para.textContent = "アップロードするファイルが選択されていません";
    item_image_preview.appendChild(para);
  } else {
    var list = document.createElement("ol");
    item_image_preview.appendChild(list);
    var _iterator = _createForOfIteratorHelper(curFiles),
      _step;
    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var file = _step.value;
        var listItem = document.createElement("li");
        var _para = document.createElement("p");
        if (validFileType(file)) {
          _para.textContent = "\u30D5\u30A1\u30A4\u30EB\u540D: ".concat(file.name, ", \u30D5\u30A1\u30A4\u30EB\u30B5\u30A4\u30BA: ").concat(returnFileSize(file.size), ".");
          var image = document.createElement("img");
          image.src = URL.createObjectURL(file);
          listItem.appendChild(image);
          listItem.appendChild(_para);
        } else {
          _para.textContent = "\u30D5\u30A1\u30A4\u30EB\u540D: ".concat(file.name, ": \u30D5\u30A1\u30A4\u30EB\u5F62\u5F0F\u304C\u6709\u52B9\u3067\u306F\u3042\u308A\u307E\u305B\u3093\u3002\u9078\u629E\u3057\u306A\u304A\u3057\u3066\u304F\u3060\u3055\u3044\u3002");
          listItem.appendChild(_para);
        }
        list.appendChild(listItem);
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  }
}

// https://developer.mozilla.org/ja/docs/Web/Media/Formats/Image_types
var fileTypes = ["image/apng", "image/bmp", "image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/svg+xml", "image/tiff", "image/webp", "image/x-icon"];
function validFileType(file) {
  return fileTypes.includes(file.type);
}
function returnFileSize(number) {
  if (number < 1024) {
    return "".concat(number, " \u30D0\u30A4\u30C8");
  } else if (number >= 1024 && number < 1048576) {
    return "".concat((number / 1024).toFixed(1), " KB");
  } else if (number >= 1048576) {
    return "".concat((number / 1048576).toFixed(1), " MB");
  }
}
/******/ })()
;