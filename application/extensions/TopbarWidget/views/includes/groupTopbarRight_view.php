<!-- Edit button -->
<?php if($hasSurveyContentUpdatePermission): ?>
    <a class="btn btn-default pjax" href="<?php echo Yii::App()->createUrl("questionGroupsAdministration/edit/surveyid/{$surveyid}/gid/{$gid}/"); ?>" role="button">
        <span class="icon-edit"></span>
        <?php eT("Question group editor");?>
    </a>
<?php endif; ?>

<?php if($hasSurveyContentDeletePermission):?>

    <!-- Delete -->
    <?php if( $oSurvey->active != "Y" ):?>
        <?php if(is_null($condarray)):?>
            <!-- can delete group and question -->
            <button
                class="btn btn-danger"
                data-toggle="modal"
                data-target="#confirmation-modal"
                data-onclick='(function() { <?php echo convertGETtoPOST(Yii::app()->createUrl("questionGroupsAdministration/delete/", ["asJson" => true, "surveyid" => $surveyid, "gid"=>$gid])); ?> })'
                data-message="<?php eT("Deleting this group will also delete any questions and answers it contains. Are you sure you want to continue?","js"); ?>"
                >
                <span class="fa fa-trash"></span>
                <?php eT("Delete current group"); ?>
            </button>
        <?php else: ?>
            <!-- there is at least one question having a condition on its content -->
            <button type="button" class="btn btn-danger btntooltip" disabled data-toggle="tooltip" data-placement="bottom" title="<?php eT("Impossible to delete this group because there is at least one question having a condition on its content"); ?>" >
                <span class="fa fa-trash"></span>
                <?php eT("Delete current group"); ?>
            </a>
        <?php endif; ?>
    <?php else:?>
        <!-- Activated -->
        <button type="button" class="btn btn-danger btntooltip" disabled data-toggle="tooltip" data-placement="bottom" title="<?php eT("You can't delete this question group because the survey is currently active."); ?>" >
            <span class="fa fa-trash"></span>
            <?php eT("Delete current group"); ?>
        </button>
    <?php endif; ?>
<?php endif; ?>