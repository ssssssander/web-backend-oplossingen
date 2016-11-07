<?php
	class HTMLBuilder {
		public $headerFileName, $bodyFileName, $footerFileName;

		public function __construct($headerFileName, $bodyFileName, $footerFileName, $title, $header) {
			$this->headerFileName = $headerFileName;
			$this->bodyFileName = $bodyFileName;
			$this->footerFileName = $footerFileName;
			$this->buildHeader($title, $header);
			$this->buildBody();
			$this->buildFooter();
		}

		public function buildHeader($title, $header) {
			$linkElementsString = $this->buildCssLinks();
			include "html/" . $this->headerFileName;
		}

		public function buildBody() {
			include "html/" . $this->bodyFileName;
		}

		public function buildFooter() {
			$scriptElementString = $this->combineJsFiles();
			include "html/" . $this->footerFileName;
		}

		public function findFiles($dir, $file) {
			return glob($dir . "/*." . $file);
		}

		private function combineJsFiles() {
			$jsFiles = $this->findFiles("js", "js");
			$combinedFileName = "js/combined-js-files.js";
			file_put_contents($combinedFileName, "");
			file_put_contents($combinedFileName, "/* METADATA */\n", FILE_APPEND);
			file_put_contents($combinedFileName, "/* This file is made up of " . (count($jsFiles) - 1) . " files */\n", FILE_APPEND);

			foreach($jsFiles as $jsFile) {
				if($jsFile != $combinedFileName) {
					file_put_contents($combinedFileName, "/* Filename: " . basename($jsFile) . " | ", FILE_APPEND);
					file_put_contents($combinedFileName, "File size: " . filesize($jsFile) . " bytes | ", FILE_APPEND);
					file_put_contents($combinedFileName, "Created: " . date(DATE_RFC2822, filectime($jsFile)) . " */\n", FILE_APPEND);
				}
			}

			foreach($jsFiles as $jsFile) {
				if($jsFile != $combinedFileName) {
					file_put_contents($combinedFileName, file_get_contents($jsFile) . "\n", FILE_APPEND);
				}
			}
			return "<script src='" . $combinedFileName . "'></script>";
		}

		private function buildJsLinks() {
			$jsFiles = $this->findFiles("js", "js");
			$scriptElements = array();

			foreach($jsFiles as $jsFile) {
				$scriptElement = "<script src='" . $jsFile . "'></script>";
				array_push($scriptElements, $scriptElement);
			}
			return implode("\n", $scriptElements);
		}

		private function buildCssLinks() {
			$globalCssVersion = "1.0";
			$cssFiles = $this->findFiles("css", "css");
			$linkElements = array();

			foreach($cssFiles as $cssFile) {
				$linkElement = "<link rel='stylesheet' type='text/css' href='" . $cssFile . "?v=" . $globalCssVersion . "'>";
				array_push($linkElements, $linkElement);
			}
			return implode("\n", $linkElements);
		}
	}
?>