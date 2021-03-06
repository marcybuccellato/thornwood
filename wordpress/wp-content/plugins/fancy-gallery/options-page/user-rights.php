<p><?php Echo $this->core->mocking_bird->Pro_Notice('feature') ?></p>

<?php

# User capabilities
$post_type = Get_Post_Type_Object($this->core->gallery_post_type->name);
If (!$post_type) return;
$arr_capabilities = Array(
  $post_type->cap->edit_posts => $this->t('Edit and create (own) galleries'),
  $post_type->cap->edit_others_posts => $this->t('Edit others galleries'),
  $post_type->cap->edit_private_posts => $this->t('Edit (own) private galleries'),
  $post_type->cap->edit_published_posts => $this->t('Edit (own) published galleries'),

  $post_type->cap->delete_posts => $this->t('Delete (own) galleries'),
  $post_type->cap->delete_private_posts => $this->t('Delete (own) private galleries'),
  $post_type->cap->delete_published_posts => $this->t('Delete (own) published galleries'),
  $post_type->cap->delete_others_posts => $this->t('Delete others galleries'),

  $post_type->cap->publish_posts => $this->t('Publish galleries'),
  $post_type->cap->read_private_posts => $this->t('View (others) private galleries'),

  'manage_categories' => $this->t('Manage taxonomies')
);

# Show the user roles
ForEach ($GLOBALS['wp_roles']->roles AS $role_name => $arr_role) : ?>
  <h4><?php Echo Translate_User_Role($arr_role['name']) ?></h4>

  <?php ForEach ($arr_capabilities AS $capability => $caption) : ?>

    <div class="capability-selection">
      <span class="caption"><?php Echo $caption ?></span>

      <input type="radio" <?php Checked(IsSet($arr_role['capabilities'][$capability])); Disabled(True) ?> >
      <label for=""><?php _e('Yes') ?></label>

      <input type="radio" <?php Checked(!IsSet($arr_role['capabilities'][$capability])); Disabled(True) ?> >
      <label for=""><?php _e('No') ?></label>
    </div>

  <?php EndForEach ?>

<?php EndForEach;