<?php

class ImageUploader {

	// Properties
	private $imageName;
	private $imageType;
	private $imageSize;
	private $imageError;
	private $imageTemp;
	private $inputName;
	private $destination;
	public  $errorMessage;
	private $imageTypes = ['image/jpeg', 'image/png', 'image/gif'];

	// Function to send back the name of the image
	public function getImageName() { return $this->imageName; }

	// Methods (functions)
	public function upload( $inputName, $destination, $newFileName='' ) {
	
		// Extract the information about the image
		$this->imageName  = $_FILES[$inputName]['name'];
		$this->imageType  = $_FILES[$inputName]['type'];
		$this->imageSize  = $_FILES[$inputName]['size'];
		$this->imageError = $_FILES[$inputName]['error'];
		$this->imageTemp  = $_FILES[$inputName]['tmp_name'];

		$this->inputName   = $inputName;
		$this->destination = $destination;

		// Show the max file size if needed
		if( $_POST['MAX_FILE_SIZE'] < 1000 ) {
			$maxSize = $_POST['MAX_FILE_SIZE'].' Bytes';
		} elseif($_POST['MAX_FILE_SIZE'] < 1000000) {
			$maxSize = ($_POST['MAX_FILE_SIZE'] / 1000) .' KiloBytes';
		} else {
			$maxSize = ($_POST['MAX_FILE_SIZE'] / 1000000) .' MegaBytes';
		}

		// Check for errors
		switch( $this->imageError ) {
			case 1: $this->errorMessage = 'Image too large for server';	break;
			case 2: $this->errorMessage = 'Image size exceeds form filesize limit of '.$maxSize; break;
			case 3: $this->errorMessage = 'Image only partially uploaded'; break;
			case 4: $this->errorMessage = 'Image failed to load / no image selected'; break;
		}

		// If an error occured
		if( $this->errorMessage != '' ) {
			return false;
		}

		// File type
		if( !in_array( $this->imageType, $this->imageTypes ) ) {
			$this->errorMessage = 'Invalid file type';
			return false;
		}

		// Generate a unique ID to be used on the file name
		$unique = uniqid('', true);

		// If a new file name has been provided
		if( $newFileName == '' ) {
			$this->imageName = $unique.$this->imageName;
		} else {
			// Get the file extension of the image
			$fileExtension = pathinfo($this->imageName, PATHINFO_EXTENSION);

			$this->imageName = $unique.$newFileName.'.'.$fileExtension;
		}

		// Move the image from the temp location to the final destination
		@move_uploaded_file($this->imageTemp, $this->destination.$this->imageName);

		// If the file did not make it to the final destination
		if( !file_exists( $this->destination.$this->imageName ) ) {
			$this->errorMessage = 'Could not move image to final destination. Permissions?';
			return false;
		}

		// Everything is done!
		return true;

	}

	public function resize($originalFileLocation, $newWidth, $destination, $imageName) {

		$mime = mime_content_type($originalFileLocation);

		// Get the mime type
		switch( $mime ) {

			case 'image/jpeg':
				$originalImage = imagecreatefromjpeg( $originalFileLocation );
			break;

			case 'image/png':
				$originalImage = imagecreatefrompng( $originalFileLocation );
			break;

			case 'image/gif':
				$originalImage = imagecreatefromgif( $originalFileLocation );
			break;

			default:
				die('NOT AN IMAGE!!!');
			break;

		}

		// Get the height of the original image
		$dimensions = getimagesize($originalFileLocation);

		// Extract the image dimensions
		$originalWidth  = $dimensions[0];
		$originalHeight = $dimensions[1];

		// Caluclate a new height
		$newHeight = ($originalHeight / $originalWidth) * $newWidth;

		// Create a brand new image
		$newImage = imagecreatetruecolor($newWidth, $newHeight);

		// Copy the original image data onto this new smaller image
		imagecopyresampled( $newImage,
							$originalImage,
							0,
							0,
							0,
							0,
							$newWidth,
							$newHeight,
							$originalWidth,
							$originalHeight );

		// Create a file based on the new image
		switch( $mime ) {

			case 'image/jpeg':
				imagejpeg($newImage, $destination.$imageName, 80);
			break;

			case 'image/png':
				imagepng($newImage, $destination.$imageName, 9);
			break;

			case 'image/gif':
				imagegif($newImage, $destination.$imageName);
			break;

		}

		// Delete any trace of the image from the server memory
		imagedestroy($originalImage);
		imagedestroy($newImage);

	}

}
