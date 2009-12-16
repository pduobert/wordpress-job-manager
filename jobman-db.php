<?php //encoding: utf-8
	
function jobman_create_db() {
	$options = get_option('jobman_options');
	
	$options['icons'] = array();
	$options['fields'] = array();
	
	$options['fields'][1] = array(
								'label' => 'Personal Details',
								'type' => 'heading',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 0,
								'categories' => array()
							);
	$options['fields'][2] = array(
								'label' => 'Name',
								'type' => 'text',
								'listdisplay' => 1,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 1,
								'categories' => array()
							);
	$options['fields'][3] = array(
								'label' => 'Surname',
								'type' => 'text',
								'listdisplay' => 1,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 2,
								'categories' => array()
							);
	$options['fields'][4] = array(
								'label' => 'Email Address',
								'type' => 'text',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 3,
								'categories' => array()
							);
	$options['fields'][5] = array(
								'label' => 'Contact Details',
								'type' => 'heading',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 4,
								'categories' => array()
							);
	$options['fields'][6] = array(
								'label' => 'Address',
								'type' => 'textarea',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 5,
								'categories' => array()
							);
	$options['fields'][7] = array(
								'label' => 'City',
								'type' => 'text',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 6,
								'categories' => array()
							);
	$options['fields'][8] = array(
								'label' => 'Post code',
								'type' => 'text',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 7,
								'categories' => array()
							);
	$options['fields'][9] = array(
								'label' => 'Country',
								'type' => 'text',
								'listdisplay' => 1,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 8,
								'categories' => array()
							);
	$options['fields'][10] = array(
								'label' => 'Telephone',
								'type' => 'text',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 9,
								'categories' => array()
							);
	$options['fields'][11] = array(
								'label' => 'Cell phone',
								'type' => 'text',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 10,
								'categories' => array()
							);
	$options['fields'][12] = array(
								'label' => 'Qualifications',
								'type' => 'heading',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 11,
								'categories' => array()
							);
	$options['fields'][13] = array(
								'label' => 'Do you have a degree?',
								'type' => 'radio',
								'listdisplay' => 1,
								'data' => 'Yes\r\nNo',
								'filter' => '',
								'error' => '',
								'sortorder' => 12,
								'categories' => array()
							);
	$options['fields'][14] = array(
								'label' => 'Where did you complete your degree?',
								'type' => 'text',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 13,
								'categories' => array()
							);
	$options['fields'][15] = array(
								'label' => 'Title of your degree',
								'type' => 'text',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 14,
								'categories' => array()
							);
	$options['fields'][16] = array(
								'label' => 'Upload your CV',
								'type' => 'file',
								'listdisplay' => 1,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 15,
								'categories' => array()
							);
	$options['fields'][17] = array(
								'label' => '',
								'type' => 'blank',
								'listdisplay' => 0,
								'data' => '',
								'filter' => '',
								'error' => '',
								'sortorder' => 16,
								'categories' => array()
							);
	$options['fields'][18] = array(
								'label' => '',
								'type' => 'checkbox',
								'listdisplay' => 0,
								'data' => 'I have read and understood the privacy policy.',
								'filter' => 'I have read and understood the privacy policy.',
								'error' => 'You need to read and agree to our privacy policy before we can accept your application. Please click the \'Back\' button in your browser, read our privacy policy, and confirm that you accept.',
								'sortorder' => 17,
								'categories' => array()
							);

	// Create the root jobs page
	$page = array(
				'comment_status' => 'closed',
				'ping_status' => 'closed',
				'post_status' => 'publish',
				'post_author' => 1,
				'post_content' => '',
				'post_name' => $options['page_name'],
				'post_title' => __('Jobs Listing', 'jobman'),
				'post_type' => 'page');
	$mainid = wp_insert_post($page);
	add_post_meta($mainid, '_jobman', 1, true);
	add_post_meta($mainid, '_jobman_mainpage', 1, true);
							
	// Create the apply page
	$page = array(
				'comment_status' => 'closed',
				'ping_status' => 'closed',
				'post_status' => 'publish',
				'post_author' => 1,
				'post_content' => '',
				'post_name' => 'apply',
				'post_title' => __('Job Application', 'jobman'),
				'post_type' => 'page',
				'post_parent' => $mainid);
	$id = wp_insert_post($page);
	add_post_meta($id, '_jobman', 1, true);
	add_post_meta($id, '_jobman_applypage', 1, true);

	// Create a page for each category
	$wp_cats = get_categories();
	$catpages = array();
	foreach($wp_cats as $cat) {
		$page = array(
					'comment_status' => 'closed',
					'ping_status' => 'closed',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => '',
					'post_name' => $cat->category_nicename,
					'post_title' => $cat->cat_name,
					'post_type' => 'page',
					'post_parent' => $mainid);
		$id = wp_insert_post($page);
		add_post_meta($id, '_jobman', 1, true);
		add_post_meta($id, '_jobman_catpage', 1, true);
		add_post_meta($id, '_jobman_cat', $cat->term_id, true);
	}

	update_option('jobman_options', $options);
}

function jobman_upgrade_db($oldversion) {
	global $wpdb;
	$options = get_option('jobman_options');
	
	if($oldversion < 4) {
		// Fix any empty slugs in the category list.
		$sql = 'SELECT * FROM ' . $wpdb->prefix . 'jobman_categories ORDER BY id;';
		$categories = $wpdb->get_results($sql, ARRAY_A);
		
		if(count($categories) > 0 ) {
			foreach($categories as $cat) {
				if($cat['slug'] == '') {
					$slug = strtolower($cat['title']);
					$slug = str_replace(' ', '-', $slug);
					
					$sql = $wpdb->prepare('UPDATE ' . $wpdb->prefix . 'jobman_categories SET slug=%s WHERE id=%d;', $slug, $id);
					$wpdb->query($sql);
				}
			}
		}
	}
	if($oldversion < 5) {
		// Re-write the database to use the existing WP tables
		
		// Create the root jobs page
		$page = array(
					'comment_status' => 'closed',
					'ping_status' => 'closed',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => '',
					'post_name' => $options['page_name'],
					'post_title' => __('Jobs Listing', 'jobman'),
					'post_type' => 'page');
		$mainid = wp_insert_post($page);
		add_post_meta($mainid, '_jobman', 1, true);
		add_post_meta($mainid, '_jobman_mainpage', 1, true);

		// Move the categories to WP categories
		$sql = 'SELECT * FROM ' . $wpdb->prefix . 'jobman_categories;';
		$categories = $wpdb->get_results($sql, ARRAY_A);
		
		$oldcats = array();
		$newcats = array();
		
		if(count($categories) > 0 ) {
			foreach($categories as $cat) {
				$oldcats[] = $cat['id'];
				// Check if a category with this slug exists
				$catid = get_category_by_slug($cat['slug'])->term_id;
				if($catid) {
					// Category already exists
					$newcats[] = $catid;
				}
				else {
					$newcat = array(
									'cat_name' => $cat['title'],
									'category_nicename' => $cat['slug']);
					$catid = wp_insert_category($newcat);
					$newcats[] = $catid;
				}
			}
		}
		
		// Create a page for each category, so we have somewhere to store the applications
		$wp_cats = get_categories();
		$catpages = array();
		foreach($wp_cats as $cat) {
			$page = array(
						'comment_status' => 'closed',
						'ping_status' => 'closed',
						'post_status' => 'publish',
						'post_author' => 1,
						'post_content' => '',
						'post_name' => $cat->category_nicename,
						'post_title' => $cat->cat_name,
						'post_type' => 'page',
						'post_parent' => $mainid);
			$id = wp_insert_post($page);
			$catpages[] = $id;
			add_post_meta($id, '_jobman', 1, true);
			add_post_meta($id, '_jobman_catpage', 1, true);
			add_post_meta($id, '_jobman_cat', $cat->term_id, true);
		}

		// Move the jobs to posts
		$oldjobids = array();
		$newjobids = array();
		$sql = 'SELECT * FROM ' . $wpdb->prefix . 'jobman_jobs;';
		$jobs = $wpdb->get_results($sql, ARRAY_A);
		if(count($jobs) > 0) {
			foreach($jobs as $job) {
				$oldjobids[] = $job['id'];
				// Get the old category ids
				$sql = $wpdb->prepare('SELECT c.id AS id FROM ' . $wpdb->prefix . 'jobman_categories AS c LEFT JOIN ' . $wpdb->prefix . 'jobman_job_category AS jc ON c.id=jc.categoryid WHERE jc.jobid=%d;', $job['id']);
				$data = $wpdb->get_results($sql, ARRAY_A);
				$cats = array();
				$catstring = '';
				if(count($data) > 0) {
					foreach($data as $cat) {
						// Make an array of the new category ids
						$cats[] = $newcats[array_search($cat['id'], $oldcats)];
					}
				}

				$page = array(
							'comment_status' => 'closed',
							'ping_status' => 'closed',
							'post_status' => 'publish',
							'post_author' => 1,
							'post_content' => $job['abstract'],
							'post_category' => $cats,
							'post_name' => strtolower(str_replace(' ', '-', $job['title']))),
							'post_title' => __('Job', 'jobman') . ': ' . $job['title'],
							'post_type' => 'page',
							'post_date' => $job['displaystartdate'],
							'post_parent' => $mainid);
				$id = wp_insert_post($page);
				$newjobids[] = $id;
				add_post_meta($id, '_jobman', 1, true);
				
				add_post_meta($id, '_jobman_salary', $job['salary'], true);
				add_post_meta($id, '_jobman_startdate', $job['startdate'], true);
				add_post_meta($id, '_jobman_enddate', $job['enddate'], true);
				add_post_meta($id, '_jobman_location', $job['location'], true);
				add_post_meta($id, '_jobman_displayenddate', $job['displayenddate'], true);
				add_post_meta($id, '_jobman_iconid', $job['iconid'], true);
			}
		}
		
		// Move the icons to jobman_options
		$options['icons'] = array();
		$sql = 'SELECT * FROM ' . $wpdb->prefix . 'jobman_icons ORDER BY id;';
		$icons = $wpdb->get_results($sql, ARRAY_A);
		
		if(count($icons) > 0 ) {
			foreach($icons as $icon) {
				$options['icons'][$icon['id']] = array(
													'title' => $icon['title'],
													'extension' => $icon['extension']
												);
			}
		}
		
		// Move the application fields to jobman_options
		$options['fields'] = array();
		$sql = 'SELECT af.*, (SELECT COUNT(*) FROM ' . $wpdb->prefix . 'jobman_application_field_categories AS afc WHERE afc.afid=af.id) AS categories FROM ' . $wpdb->prefix . 'jobman_application_fields AS af ORDER BY af.sortorder ASC;';
		$fields = $wpdb->get_results($sql, ARRAY_A);

		if(count($fields) > 0 ) {
			foreach($fields as $field) {
				$options['fields'][$field['id']] = array(
													'label' => $field['label'],
													'type' => $field['type'],
													'listdisplay' => $field['listdisplay'],
													'data' => $field['data'],
													'filter' => $field['filter'],
													'error' => $field['error'],
													'sortorder' => $field['sortorder'],
													'categories' => array()
												);
				if($field['categories'] > 0) {
					// This field is restricted to certain categories
					$sql = 'SELECT categoryid FROM ' . $wpdb->prefix . 'jobman_application_field_categories WHERE afid=' . $field['id'] . ';';
					$field_categories = $wpdb->get_results($sql, ARRAY_A);
					
					if(count($categories) > 0) {
						foreach($categories as $cat) {
							foreach($field_categories as $fc) {
								if(in_array($cat['id'], $fc)) {
									$options['fields'][$field['id']]['categories'][] = $newcats[array_search($cat['id'], $oldcats)]
									break;
								}
							}
						}
					}
				}
			}
		}
		
		// Move the applications to comments
		$time = current_time('mysql', $gmt = 0);
		
		$sql .= 'SELECT a.*, (SELECT COUNT(*) FROM ' . $wpdb->prefix . 'jobman_application_categories AS ac WHERE ac.applicationid=a.id) AS categories FROM ' . $wpdb->prefix . 'jobman_applications AS a;';
		$apps = $wpdb->get_results($sql, ARRAY_A);
		if(count($apps) > 0) {
			foreach($apps as $app) {
				$sql = 'SELECT * FROM ' . $wpdb->prefix . 'jobman_application_data WHERE applicationid=' . $app['id'] . ';';
				$data = $wpdb->get_results($sql, ARRAY_A);
				if(count($data) > 0) {
					$content = array();
					foreach($data as $item) {
						$content[$item['fieldid']] = $item['data'];
					}
					
					$comment = array(
									'comment_content' => $content,
									'comment_date' => $app['submitted']
								);
					
					if($app['jobid'] > 0) {
						// Store against the job
						$comment['comment_post_ID'] = $newjobids[array_search($app['jobid'], $oldjobids)];
					} 
					else if($app['categories'] > 0) {
						// Store against the category
						if(count($categories) > 0) {
							$cat = reset($categories);
							$comment['comment_post_ID'] = $newcats[array_search($cat['id'], $oldcats)];
						}
						else {
							$comment['comment_post_ID'] = $mainid;
						}
					}
					else {
						// Store against main
						$comment['comment_post_ID'] = $mainid;
					}
					
					$id = wp_insert_comment($comment);
					
					add_comment_meta($id, '_jobman', 1, true);
				}
			}
		}

		// Create the apply page
		$page = array(
					'comment_status' => 'closed',
					'ping_status' => 'closed',
					'post_status' => 'publish',
					'post_author' => 1,
					'post_content' => '',
					'post_name' => 'apply',
					'post_title' => __('Job Application', 'jobman'),
					'post_type' => 'page',
					'post_parent' => $mainid);
		$id = wp_insert_post($page);
		add_post_meta($id, '_jobman', 1, true);
		add_post_meta($id, '_jobman_applypage', 1, true);
		
		// Drop the old tables
		$tables = array(
					$wpdb->prefix . 'jobman_jobs',
					$wpdb->prefix . 'jobman_categories',
					$wpdb->prefix . 'jobman_job_category',
					$wpdb->prefix . 'jobman_icons',
					$wpdb->prefix . 'jobman_application_fields',
					$wpdb->prefix . 'jobman_application_field_categories',
					$wpdb->prefix . 'jobman_applications',
					$wpdb->prefix . 'jobman_application_categories',
					$wpdb->prefix . 'jobman_application_data'
				);
				
		foreach($tables as $table) {
			$sql = 'DROP TABLE IF EXISTS ' . $table;
			// $wpdb->query($sql);
		}
	}
	
	update_option('jobman_options', $options);
}

function jobman_drop_db() {
}

?>