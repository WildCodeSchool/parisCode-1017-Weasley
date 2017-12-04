<?php
/**
 * Created by PhpStorm.
 * User: Florian
 * Date: 27/11/17
 * Time: 23:48
 */

namespace Weasley\Services;

class Uploads
{
	/**
	 * Uploads directory
	 * @var string
	 */
	const DIR_PATH = "uploads/";

	/**
	 *
	 * Méthode permettant de vérifier les erreurs et contraintes lié au fichier
	 *
	 * @param UploadedFile $file
	 * @return null|string
	 */
	public function checkError(UploadedFile $file){
		$errors = [];
		$allowed = array ('jpg', 'png', 'gif');

		if ($file->getSize() > 2000000){
			return $errors = 'Votre fichier est trop lourd';
		}
		elseif (!in_array($file->getExt(), $allowed)){
			return $errors = "l'extension de votre fichier n'est pas prise en compte";
		}
		else{
			return $errors = null;
		}
	}

	/**
	 *
	 * Méthode permettant l'upload du fichier
	 *
	 * @param $file
	 * @return bool|null|string
	 */
	public function upload(UploadedFile $file){
		$error = $this->checkError($file);

		if ($error == null){
			$result = move_uploaded_file($file->getTmpName(), self::DIR_PATH . $file->getFileName());
		}
		return $error;
	}
}