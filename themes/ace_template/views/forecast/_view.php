<?php if($data->isRelevantDate): ?>
  <?php $forecast = $this->getForecast($data->date); ?>
  <span style="font-size: 60%;"><?php echo $forecast['temperature']; ?></span> <br/>
  <span style="font-size: 60%;"><?php echo $forecast['conditions']; ?></span> <br/>
<? endif; ?>
 
<?php echo $data->date->format('j'); ?>