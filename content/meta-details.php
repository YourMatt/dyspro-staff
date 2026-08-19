<div class="ds-meta-details">

    <table>
    <tr><td class="col1">
        <label for="staff_title">Title</label>
    </td><td class="col2">
        <input type="text" name="staff_title" maxlength="100" value="<?= esc_attr ($staff_data["_ds_title"][0]) ?>"/>
    </td></tr>
    <tr><td class="col1">
        <label for="staff_start_date">Start Date</label>
    </td><td class="col2">
        <input type="text" name="staff_start_date" maxlength="20" value="<?= esc_attr ($staff_data["_ds_start_date"][0]) ?>"/>
    </td></tr>
    <tr><td class="col1">
        <label for="staff_term_expiration">Term Expiration</label>
    </td><td class="col2">
        <input type="text" name="staff_term_expiration" maxlength="20" value="<?= esc_attr ($staff_data["_ds_term_expiration"][0]) ?>"/>
    </td></tr>
    <tr><td class="col1">
        <label for="staff_company">Company</label>
    </td><td class="col2">
        <input type="text" name="staff_company" maxlength="100" value="<?= esc_attr ($staff_data["_ds_company"][0]) ?>"/>
    </td></tr>
    <tr><td class="col1">
        <label for="staff_committee">Committee</label>
    </td><td class="col2">
        <input type="text" name="staff_committee" maxlength="100" value="<?= esc_attr ($staff_data["_ds_committee"][0]) ?>"/>
    </td></tr>
    <tr><td class="col1">
        <label for="staff_membership">Membership</label>
    </td><td class="col2">
        <input type="text" name="staff_membership" maxlength="100" value="<?= esc_attr ($staff_data["_ds_membership"][0]) ?>"/>
    </td></tr>
    <tr><td class="col1">
        <label for="staff_phone">Phone</label>
    </td><td class="col2">
        <input type="text" name="staff_phone" maxlength="100" value="<?= esc_attr ($staff_data["_ds_phone"][0]) ?>"/>
    </td></tr>
    </table>

</div>