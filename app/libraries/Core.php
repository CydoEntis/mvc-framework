<?php
// Core App Class

class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = "Index";
  protected $params = [];

  public function __construct()
  {
    $url = $this->getUrl();

    // Look into controllers for first value and ucword will capitalize first letter.
    //  ********************** If broken use this 1 ****************
    // if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
    if (file_exists('../controllers/' . ucwords($url[0]) . '.php')) {
      // Will set a new controler
      $this->currentController = ucwords($url[0]);
      unset($url[0]);
    }

    // Require the controller
    require_once '../app/controllers/' . $this->currentController . ".php";
    $this->currentController = new $this->currentController;
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      // Filter variables as string/number
      $url = filter_var($url, FILTER_SANITIZE_URL);

      // Split into array.
      $url = explode("/", $url);

      return $url;
    }
  }
}
