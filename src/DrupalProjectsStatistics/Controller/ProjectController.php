<?php

namespace DrupalProjectsStatistics\Controller;

use DrupalProjectsStatistics\Entity\Project;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ProjectController
{
  public function indexAction(Request $request, Application $app) {
    // Perform pagination logic.
    $limit = 20;
    $total = $app['repository.project']->getCount();
    $numPages = ceil($total / $limit);
    $currentPage = $request->query->get('page', 1);
    $offset = ($currentPage - 1) * $limit;

    // Gets all projects.
    $projects = $app['repository.project']->findAll(array(), array(), $limit, $offset);

    // Gets all statistics for given projects.
    $statistics = $app['repository.statistic']->findAllByProjectId(array_keys($projects), array(), $limit, 0);

    // Gets a report per project.
    $reports = $this->getReports($projects, $statistics);

    $data = array(
      'projects' => $reports ,
      'currentPage' => $currentPage,
      'numPages' => $numPages,
      'here' => $app['url_generator']->generate('projects'),
    );
    return $app['twig']->render('projects.html.twig', $data);
  }

  /**
   * @param Request $request
   * @param Application $app
   * @return mixed
   */
  public function drupalCommerceIndexAction(Request $request, Application $app) {

    // Perform pagination logic.
    $limit = 20;
    $total = $app['repository.flag']->getFlagCountByType('drupalcommerce', array('entity_type' => 'project'));
    $numPages = ceil($total / $limit);
    $currentPage = $request->query->get('page', 1);
    $offset = ($currentPage - 1) * $limit;

    // Gets all projects.
    $flags = $app['repository.flag']->getFlagsByType('drupalcommerce', array('entity_type' => 'project'), $limit, $offset);

    if (!empty($flags)) {
      $project_ids =array();
      foreach($flags as $flag) {
        $project_ids[] = $flag->getEntityId();
      }

      // Gets all projects.
      $projects = $app['repository.project']->findAll($project_ids, array(), $limit);

      // Gets all statistics for given projects.
      $statistics = $app['repository.statistic']->findAllByProjectId($project_ids, array(), $limit);

      // Gets a report per project.
      $reports = $this->getReports($projects, $statistics);
    }

    $data = array(
      'projects' => $reports ,
      'currentPage' => $currentPage,
      'numPages' => $numPages,
      'here' => $app['url_generator']->generate('drupal_commerce'),
    );

    return $app['twig']->render('projects.html.twig', $data);
  }

  /**
   * @param Request $request
   * @param Application $app
   * @return mixed
   */
  public function commerceGuysIndexAction(Request $request, Application $app) {
    // Perform pagination logic.
    $limit = 20;
    $total = $app['repository.flag']->getFlagCountByType('commerceguys', array('entity_type' => 'project'));
    $numPages = ceil($total / $limit);
    $currentPage = $request->query->get('page', 1);
    $offset = ($currentPage - 1) * $limit;
    $reports = array();

    // Gets all projects.
    $flags = $app['repository.flag']->getFlagsByType('commerceguys', array('entity_type' => 'project'), $limit, $offset);

    if (!empty($flags)) {
      $project_ids =array();
      foreach($flags as $flag) {
        $project_ids[] = $flag->getEntityId();
      }

      // Gets all projects.
      $projects = $app['repository.project']->findAll($project_ids, array(), $limit);

      // Gets all statistics for given projects.
      $statistics = $app['repository.statistic']->findAllByProjectId($project_ids, array(), $limit);

      // Gets a report per project.
      $reports = $this->getReports($projects, $statistics);
    }

    $data = array(
      'projects' => $reports ,
      'currentPage' => $currentPage,
      'numPages' => $numPages,
      'here' => $app['url_generator']->generate('commerce_guys'),
    );

    return $app['twig']->render('projects.html.twig', $data);
  }

  /**
   * @param $projects
   * @param $statistics
   * @return array
   */
  private function getReports($projects, $statistics) {
    $rows = array();
    $row  = array(
      'id' => '',
      'name' => '',
      'title' => '',
      'url' => '',
      'downloads' => '',
      'installs' => '',
      'openedBugs' => '',
      'totalBugs' => '',
      'openedIssues' => '',
      'totalIssues' => '',
    );

    foreach ($projects as $project) {
      $project_info = array(
        'id' => $project->getId(),
        'name' => $project->getName(),
        'title' => $project->getTitle(),
        'url' => $project->getUrl(),
        'lastCommit' => $project->getLastCommit(),
      );

      $statistic_info = array();
      if (isset($statistics[$project->getId()])) {
        $statistic = $statistics[$project->getId()];
        $statistic_info = array(
          'downloads' => $statistic->getDownloads(),
          'installs' => $statistic->getInstalls(),
          'openedBugs' => $statistic->getOpenedBugs(),
          'totalBugs' => $statistic->getTotalBugs(),
          'openedIssues' => $statistic->getOpenedIssues(),
          'totalIssues' => $statistic->getTotalIssues(),
        );
      }
      $rows[] = array_merge($row, $project_info, $statistic_info);
    }

    return $rows;
  }




  /**
   * @param Request $request
   * @param Application $app
   * @return mixed
   */
  public function viewAction(Request $request, Application $app)
  {
    $project = $request->attributes->get('project');

    if (!$project) {
      $app->abort(404, 'The requested project was not found.');
    }

    $statistics = $app['repository.statistic']->findAll(array(), array('project_id' => $project->getId()), 30, 0, array('created' => 'DESC'));

    $releases = $app['repository.release']->findAll(array(), array('project_id' => $project->getId()));

    //$flags = $app['repository.flag']->getProjectFlag($project->getId());

    $flags = array(
      array(
        'flagTitle' => 'Commerce Guys',
        'flagTypeId' => 1,
        'flagStatus' => ''
      ),
      array(
        'flagTitle' => 'Drupal Commerce',
        'flagTypeId' => 2,
        'flagStatus' => ''
      ),
    );

    $data = array(
      'project' => $project,
      'statistic' => reset($statistics),
      'releases' => $releases,
      'flags' => $flags,
    );

    return $app['twig']->render('project.html.twig', $data);
  }

  /**
   * @param Request $request
   * @param Application $app
   * @return mixed
   */
  public function searchAction(Request $request, Application $app)
  {
    $q = $request->get('q');

    $search = $app['repository.project']->searchProjects($q, 100);

    $data = array(
      'q' => $q,
      'results' => $search['results'],
    );

    return $app['twig']->render('search.html.twig', $data);
  }

  /**
   * @param Request $request
   * @return string
   */
  private function projectsPageGetSort(Request $request) {
    switch(strtolower($request->query->get('sort'))) {
      case 'downloads':
        $sort = 's1.downloads';
        break;
      case 'installs':
        $sort = 's1.installs';
        break;
      case 'opened_issues':
        $sort = 's1.opened_issues';
        break;
      case 'total_issues':
        $sort = 's1.total_issues';
        break;
      case 'opened_bugs':
        $sort = 's1.opened_bugs';
        break;
      case 'total_bugs':
        $sort = 's1.total_bugs';
        break;
      case 'name':
      default:
        $sort = 'name';
        break;
    }
    return $sort;
  }

  /**
   * @param Request $request
   * @return array
   */
  private function projectsPageGetOrder(Request $request) {
    switch(strtolower($request->query->get('order'))) {
      case 'desc':
        return array(
          'order' => 'desc',
          'new_order' => 'asc',
        );

      case 'asc':
      default:
        return array(
          'order' => 'asc',
          'new_order' => 'desc'
        );
    }
  }



  public function flagAction(Request $request, Application $app) {
    $project = $request->attributes->get('project');

    $flag_type = $request->attributes->get('flagType');

    if (!$project || !$flag_type) {
      $app->abort(404, 'The requested artist was not found.');
    }

    $token = $app['security']->getToken();
    $user = $token->getUser();
    if ($user == 'anon.') {
      // Only logged-in users can comment.
      return;
    }

    $app['repository.flag']->flagging($project, $flag_type);

    return '';
  }
}