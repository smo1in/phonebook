<!DOCTYPE html>
<ul class="collection">
        <li class="collection-item">
            <div class="input-fieldx">
                <i class="secondary-content">
                    <input type="hidden" name="cbx<?php echo ($name); ?>" value="0">
                    <input type="checkbox" id="cbx<?php echo ($name); ?>" name="cbx<?php echo ($name); ?>">
                    <label for="cbx<?php echo ($name); ?>" class="check">
                        <span>Publish field</span>
                    </label>
                </i>
                <input input type="text" name="<?php echo ($name); ?>" placeholder="" value="<?php echo ($param); ?>" />
            </div>
        </li>
    </ul>