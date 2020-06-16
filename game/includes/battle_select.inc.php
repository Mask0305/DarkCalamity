<?php

$sql="SELECT * FROM `chapter` WHERE `ch`='".$_GET['ch']."'";
$result=filterTable($sql);
?>

<div class="tile-body color transparent-black rounded-corners">
  <div class="table-responsive">
    <table  class="table table-datatable table-custom" id="basicDataTable">
      <thead>
        <tr>
          <th class="sort-numeric">章節</th>
          <th class="sort-alpha">難易度</th>
          <th class="">掉落物品</th>
          <th class="text-center" style="width:7em">戰鬥次數</th>
          <th class="text-center" style="width:10em">進行戰鬥</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $i=1;
        while($row = mysqli_fetch_array($result)):?>
          <tr>
            <td><?php echo substr($row['ch_num'],0,2).$i;?></td>
              <?php switch($row['ch_extent']){
                case 1 : 
                        echo '<td class="color-green priority">easy';
                        break;
                case 2 :
                        echo '<td class="color-orange priority">Normal';
                        break;
                case 3 :
                        echo '<td class="color-red priority">Hard';
                        break;
              }?>
            </td>
            
            <td>村長系列、迪雷德爾草、史萊姆殘渣、破舊布</td>
            <td class="text-right"><span id="projectbar1">0</span></td>
            <td class="text-center"><button type="button" class="btn btn-dutch">自動</button></td>
          </tr>
        <?php 
          $i++;
          endwhile;?>
          <!--  -
          <tr id="2">
            <td>2</td>
            <td class="color-green priority">Easy</td>
            <td class="progress-cell">
              <div class="progress-info">
                <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
              </div>
              <div class="progress progress-little">
                <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
              </div>
            </td>
            <td>村長的胸甲、迪雷德爾草、史萊姆殘渣、破舊布</td>
            <td class="text-right"><span id="projectbar2">0</span></td>
            <td class="text-center"><button type="button" class="btn btn-dutch">自動</button></td>
          </tr>
          <tr id="3">
            <td>3</td>
            <td class="color-green priority">Easy</td>
            <td class="progress-cell">
              <div class="progress-info">
                <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
              </div>
              <div class="progress progress-little">
                <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
              </div>
            </td>
            <td>村長的鞋子、迪雷德爾草、史萊姆殘渣、破舊布</td>
            <td class="text-right"><span id="projectbar3">0</span></td>
            <td class="text-center"><button type="button" class="btn btn-dutch">自動</button></td>
          </tr>
          <tr id="4">
            <td>4</td>
            <td class="color-orange priority">Normal</td>
            <td class="progress-cell">
              <div class="progress-info">
                <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
              </div>
              <div class="progress progress-little">
                <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
              </div>
            </td>
            <td>村長的褲子、迪雷德爾草、史萊姆殘渣、破舊布</td>
            <td class="text-right"><span id="projectbar4">0</span></td>
            <td class="text-center"><button type="button" class="btn btn-dutch">自動</button></td>
          </tr>
          <tr id="5">
            <td>5</td>
            <td class="color-orange priority">Normal</td>
            <td class="progress-cell">
              <div class="progress-info">
                <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
              </div>
              <div class="progress progress-little">
                <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
              </div>
            </td>
            <td>稍舊的弓、稍舊的長劍、稍舊的砍斧、迪雷德爾草、史萊姆殘渣、史萊珠、破舊布</td>
            <td class="text-right"><span id="projectbar5">0</span></td>
            <td class="text-center"><button type="button" class="btn btn-dutch">自動</button></td>
          </tr>
          <tr id="6">
            <td>6</td>
            <td class="color-red priority">Hard</td>
            <td class="progress-cell">
              <div class="progress-info">
                <div class="percent"><span class="animate-number" data-value="0" data-animation-duration="1500">0</span>%</div>
              </div>
              <div class="progress progress-little">
                <div class="progress-bar progress-bar-transparent-white animate-progress-bar" data-percentage="0%"></div>
              </div>
            </td>
            <td>村長的裝備全系列、迪雷德爾草、史萊姆殘渣、史萊珠、破舊布</td>
            <td class="text-right"><span id="projectbar6">0</span></td>
            <td class="text-center"><button type="button" class="btn btn-dutch">自動</button></td>
          </tr-->
        </tbody>
    </table>
  </div>
</div>