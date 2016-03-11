<?php
/**
 * AuthHelper: Allow access to auth vars in view
 * @usage $this->Auth->get('Admin.id'), $this->Auth->get('User.email')
 */
namespace App\View\Helper;
use Cake\View\Helper;
use Cake\Controller\Component;
class AuthHelper extends Helper
{
    /**
     * The current user, used for stateless authentication when
     * sessions are not available.
     *
     * @var array
     */
     var $helpers = array('Html');
    protected $_user = null;
    /**
     * Initialize current user from session data
     * before rendering view.
     *
     * @return void
     */
    public function beforeRender()
    {
        $this->_user = $this->request->Session()->read('Auth');
    }
    /**
     * Get the current user.
     *
     * @param  string $key field to retrieve. Leave null to get entire User record
     * @return array|null Either User record or null if no user is logged in.
     */
    public function loginLink()
    {
      $authUser = $this->request->Session()->read('Auth.User');

      if (!$authUser)
      {
        return $this->Html->link('<i class="glyphicon glyphicon-log-in"></i> Login', ['controller' => 'Users','action' => 'login'], array(
        'escape' => false
    ));
      } else {
        return $this->Html->link('<i class="glyphicon glyphicon-user"></i> '.$authUser['username'], ['controller' => 'Users','action' => 'view', $authUser['id']], array(
        'escape' => false
    ));
      }

    }

    public function logoutLink()
    {
      $authUser = $this->request->Session()->read('Auth.User');

      if (!$authUser)
      {
        return null;
      } else {
        return $this->Html->link('<i class="glyphicon glyphicon-log-out"></i> '.'Logout', ['controller' => 'Users','action' => 'logout'], array(
        'escape' => false));
      }

    }


}
