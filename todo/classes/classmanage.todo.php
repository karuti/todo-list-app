<?php
include_once('class.database.php');
/**
* 
*/
class ManageTodo
{
	public $link;
	function __construct()
	{
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
		
	}

	function createToDo($username,$title,$description,$due_date,$label){
			$stmt = "INSERT INTO todo (username,title,description,due_date,created_on,label) VALUES(:username,:title,:description,:due_date,:created_on,:label)";
			$query = $this->link->prepare($stmt);
			try {
				$array = array(":username" => $username,":title" =>$title,":description" =>$description,":due_date" =>$due_date,":label" =>$label,":created_on" =>date('Y-m-d'));
				$query->execute($array);
				$counts = $query->rowCount();
			return $counts;

			} catch (Exception $e) {
				echo "there was an error" . $e-> getMessage();
			}
			
			
	}
function ListToDo($username,$label=null)
{
	if (isset($label)) {
		$query = $this->link->query("SELECT * FROM todo WHERE username='$username' AND  label= '$label'");

			$counts= $query->rowCount();
			if ($counts>0) {
			$result = $query->fetchAll();
			
			}else{
			 $result = $counts;
			}
			 return $result;
	}
	/*else{
		$query = $this->link->query("SELECT * FROM todo WHERE username='$username'");
	}*/
	
		   
}
function CountTodo($username,$status){
$query = $this->link->query("SELECT count(*) AS TOTAL_TODO FROM todo WHERE username='$username' AND status ='$status'");
$query->setFetchMode(PDO::FETCH_OBJ);
$counts=$query->fetchAll();
return $counts;
}
function editTodo($username,$id,$title,$description,$due_date,$label)
{
		$query = "UPDATE todo SET title=:title,description=:description,due_date =:due_date,label=:label WHERE username= :username AND id= :id";
		$array =array(":title"=> $title,":description"=> $description,":due_date"=> $due_date,":label"=> $label,":username"=> $username,":id"=> $id);
		try {
			$prepare=$this->link->prepare($query);
			$prepare->execute($array);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
}
function deleteTodo($username,$id)
{
	$query= $this->link->query("DELETE FROM todo WHERE username = '$username' AND id='$id' LIMIT 1");
	$counts = $query->rowCount();
	return $counts;
}
function getList($id){
	$stmt="SELECT * FROM todo WHERE id=:myid" ;
	$query = $this->link->prepare($stmt);
	try {
		$query->execute(array(":myid"=>$id));
		while ($result= $query->fetch()) {
			?>
			<div id="mainContent" style="margin:30px">
			<div id="head">
		<h2>Edit Todo</h2>
	</div>
<form method="post" action="edit.php?id=<?php echo $_GET['id'];?>">
<div id="mainBody">
  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="title" name="title"placeholder="your title....." required value="<?php echo $result['title'];?>"/>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label"> Description</label>
    <div class="col-sm-10">
      <textarea id="description" name="description"  cols = "70" placeholder="write here..." required=""><?php echo $result['description'];?></textarea> 
    </div>
  </div>
  <div class="form_group row">
		<label for = "title" class="col-sm-2 col-form-label">Due date</label>
		<div class="col-sm-10">
		<input type="text" id="datepicker" name="due_date" autocomplete="off" required value="<?php echo $result['due_date'];?>">
	</div>
	</div>
  <div class="form_group row">
		 <label for="label" class="col-sm-2 col-form-label"> Label Under</label>
    <div class="col-sm-10">
		<select name="label_under" id="label_under" required>
			<option selected=""><?php echo $result['label'];?></option>
			<option>Inbox</option>
			<option>Read Later</option>
			<option>Important</option>
		</select>
	</div>
	 <!--<div class="form-group row">
	 	<div id="seekbar"></div>
	 	<div id="progress"><?php# echo $result['progress'];?>%</div>
	 	<input type="hidden" name="progress_value" value="<?php #echo $td['progress'];?>" id="progress_value">
  	 </div>-->
  <div class="form-group row">
  	  <div class="col-sm-10" >
		<input type="submit" name="edit_todo" value="edit" id="edit_todo" class="btn btn-info">
</div>  
    </div>
     </div>
</form>  
</div>
    <?php
		}
		

	} catch (Exception $e) {
		
	}
}
/*function listindTodo($param){
	foreach ($param as $key => $value) {
		$query = $this->link->query("SELECT * FROM todo WHERE id='$myid'");
		$counts= $query->rowCount();
		return $counts;
		if ($counts == 1) {
			$result = $query->fetchAll();
			
		}
		else{
			$result = $counts;
		}
		return $result;
	}
}*/
}
?>