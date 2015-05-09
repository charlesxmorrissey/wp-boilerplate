
/* ---------------------------------- */

/*
Boilerplate - This javascript is the main
javascript for the sites actions.
*/

/* ---------------------------------- */

var SITE = window.SITE || {};
SITE.Behaviors = {};
SITE.Helpers = {};
SITE.Functions = {};

// Look through the document (or ajax'd in content if "context" is defined) to look for "data-behavior" attributes.

// Initialize a new instance of the method if found, passing through the element that had the attribute
SITE.LoadBehavior = function ( context ) {
  if ( context === undefined ) {
    context = document;
  }

  var all = context.querySelectorAll('[data-behavior]');
  var i = -1;

  while ( all[++i] ) {
    var currentElement = all[i];
    var behaviors = currentElement.getAttribute('data-behavior');
    var splitted_behaviors = behaviors.split(' ');
    for ( var j = 0, k = splitted_behaviors.length; j < k; j++ ) {
      var thisBehavior = SITE.Behaviors[splitted_behaviors[j]];
      if ( typeof thisBehavior !== 'undefined' ) {
        thisBehavior.call(currentElement, currentElement);
      }
    }
  }
};

// Make console.log safe
if (typeof console === "undefined") {
  console = {
    log: function () {
      return;
    }
  };
}

// Initialize
document.addEventListener( 'DOMContentLoaded', function () {
  SITE.LoadBehavior();
});
