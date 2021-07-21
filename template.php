<?php


function craipe_form_alter(&$form, &$form_state, $form_id) {
	// target a single form
	if($form_id == "search_block_form"){
 $form['search_block_form']['#title'] = t('Search / Recherche'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 40;  // define size of the textfield
    //$form['search_block_form']['#default_value'] = t('Search / Recherche'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
    $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/Magnifying_glass_icon.svg');

    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search / Recherche';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search / Recherche') {this.value = '';}";
    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search / Recherche'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('Search / Recherche');
	}
	if($form_id == "islandora_solr_simple_search_form"){
		$form['simple']['islandora_simple_search_query']['#default_value'] = t('Search / Recherche'); // Set a default value for the textfield
		$form['simple']['islandora_simple_search_query']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search / Recherche';}";
		$form['simple']['islandora_simple_search_query']['#attributes']['onfocus'] = "if (this.value == 'Search / Recherche') {this.value = '';}";
	}
}


