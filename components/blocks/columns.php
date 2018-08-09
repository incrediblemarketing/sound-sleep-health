<?php

  $number_of_columns = get_sub_field('number_of_columns');
  $row_class = get_sub_field('row_class');
  $column_classes = get_sub_field('column_classes');
  $columns = array(
    'column_1' => get_sub_field('column_1'),
    'column_2' => get_sub_field('column_2'),
    'column_3' => get_sub_field('column_3'),
    'column_4' => get_sub_field('column_4'),
    'column_5' => get_sub_field('column_5'),
    'column_6' => get_sub_field('column_6'),
  );

?>

<div class="row <?php echo $row_class; ?>">

  <?php for ($i = 1; $i <= $number_of_columns; $i++) : ?>

    <div class="<?php echo $column_classes['column_' . $i]['class']; ?>">
      <div class="column-content <?php echo $column_classes['column_' . $i]['content_class']; ?>">

        <?php echo $columns['column_' . $i]; ?>

      </div>
    </div>

  <?php endfor; ?>
  
</div>
