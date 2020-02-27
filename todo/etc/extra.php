<tr>
  				<td>Todo</td>
  				<td>Should complete it</td>
  				<td>2018-11-3</td>
  				<td>18hrs</td>
  				<td>
  					<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:45%"></div>
</div>

  				</td>
  				<td>
  					edit|delete
  				</td>
  			</tr>


         <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="title" name="title"placeholder="your title....." required value="<?php #echo $td['title'];?>"/>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label"> Description</label>
    <div class="col-sm-10">
      <textarea id="description" name="description"  cols = "70" placeholder="write here..." required value="<?php#echo $td['description'];?>"></textarea> 
    </div>
  </div>
  <div class="form_group row">
    <label for = "title" class="col-sm-2 col-form-label">Due date</label>
    <div class="col-sm-10">
    <input type="text" id="datepicker" name="due_date" autocomplete="off" required value="<?php #echo $td['due_date'];?>">
  </div>
  </div>
  <div class="form_group row">
     <label for="label" class="col-sm-2 col-form-label"> Label Under</label>
    <div class="col-sm-10">
    <select name="label_under" id="label_under" required>
      <option>Select</option>
      <option>Inbox</option>
      <option>Read Later</option>
      <option>Important</option>
    </select>
  </div>
   <div class="form-group row">
    <div id="seekbar"></div>
    <div id="progress"><?php# echo $td['progress'];?>%</div>
    <input type="hidden" name="progress_value" value="<?php #echo $td['progress'];?>" id="progress_value">
     </div>
  <div class="form-group row">
      <div class="col-sm-10" >
    <input type="submit" name="create_todo" value="create" id="create_todo" class="btn btn-primary">
</div>  
    </div>-->