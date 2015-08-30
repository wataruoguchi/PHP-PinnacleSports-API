/**
 * jquery.pinnacleSports.js
 * Working with jQuery 2.1.4
 * @author Wataru Oguchi @watarutwt
 * GitHub: https://github.com/wataruoguchi/PHP-PinnacleSports-API
*/
/* global jQuery */
(function($) {
	"use strict";

	$.fn.pinnacleSports = function() {
		/**
		 * Queue Get request
		 * @param string operation
		 * @param object arg
		 */
		var clientGet = function(operation, arg) {
			return $.ajax({
				url: "AjaxCall.php?" + operation,
				type: "GET",
				dataType: "json",
				data: {data: arg}
			});
		};

		/**
		 * Queue Post request
		 * @param string operation
		 * @param object arg
		 */
		var clientPost = function(operation, arg) {
			return $.ajax({
				url: "AjaxCall.php",
				type: "POST",
				dataType: "json",
				data: {operation: operation, data: arg}
			});
		};

		/**
	   * API functions
	   * @param string/null _arg
		 * I want to make those into one. Though I don't want to use "arguments.callee".
		 * Thus I keep them how they are.
	   */
		this.getSports = function() {
			return clientGet("getSports", null);
		};

		this.getLeagues = function(_arg) {
			return clientGet("getLeagues", _arg);
		};

		this.getFeed = function(_arg) {
			return clientGet("getFeed", _arg);
		};

		this.getFixtures = function(_arg) {
			return clientGet("getFixtures", _arg);
		};

		this.getOdds = function(_arg) {
			return clientGet("getOdds", _arg);
		};

		this.getParlayOdds = function(_arg) {
			return clientGet("getParlayOdds", _arg);
		};

		this.getCurrencies = function() {
			return clientGet("getCurrencies", null);
		};

		this.getClientBalance = function() {
			return clientGet("getClientBalance", null);
		};

		this.placeBet = function(_arg) {
			return clientPost("placeBet", _arg);
		};

		this.placeParlayBet = function(_arg) {
			return clientPost("placeParlayBet", _arg);
		};

		this.getLine = function(_arg) {
			return clientGet("getLine", _arg);
		};

		this.getParlayLine = function(_arg) {
			return clientPost("getParlayLine", _arg);
		};

		this.getBets = function(_arg) {
			return clientGet("getBets", _arg);
		};

		this.getInrunning = function() {
			return clientGet("getInrunning", null);
		};

		this.getTranslations = function(_arg) {
			return clientGet("getTranslations", _arg);
		};

		return (this);
	}; //$.fn.pinnacleSports
})(jQuery);
