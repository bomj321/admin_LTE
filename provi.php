
<?php
    include('conexion.php');

$q = $_GET['q'];
$c = $_GET['c'];
if($c=='0'){
$sql=("SELECT * FROM cantones WHERE id_provi = '".$q."'");
$resul = mysqli_query($con,$sql);
}
else{

$sql=("SELECT e.* , c.* FROM empleados as e inner join cantones as c on(c.id_canto=e.Canton) WHERE e.Cedula = '$c'");
$resul = mysqli_query($con,$sql);

}
?>
            <select name="Canton" class="form-control">
             <?php
        while($result=mysqli_fetch_array($resul)){ ?>
              <option value="<?php  echo  $result['id_canto'];?>"><?php  echo  utf8_encode($result['nom_canto']);?></option>
              <?php } ?>
            </select>



                    

              
