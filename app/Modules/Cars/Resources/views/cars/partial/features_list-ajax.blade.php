<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%'>
    <tbody>
        <tr style="font-size:small;">

            <?php
            $counter=0;
            if (!empty($featuresList)) { 
                foreach ($featuresList as $key=> $value): 
                    ++$counter;
                    $checked ='';

                    if(!empty($carfeatures)){
                        foreach ($carfeatures as $keyFeat => $featureId) { 
                            
                            if($featureId->config_feature_id == $key){
                                $checked = 'checked="checked"';
                            }
                        }
                    }
                    ?>

                    <td width="1%"><input name="config_feature_id[]" type="checkbox" id="config_feature_id[]" value="{{ $key }}" {{$checked}} /></td>
                    <td>{{ $value }}</td>
                    
                    <?php  if($counter%4==0)echo '</tr><tr style="font-size:small;">'; ?>
                    
                    <?php
                endforeach;
            } else {
                ?>
            </tr>
            <tr>
                <td colspan="8">
                    <center>No Features Found !!!</center>
                </td>
            </tr>
        <?php } ?>


    </tbody>
</table>