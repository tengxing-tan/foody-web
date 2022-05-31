<!DOCTYPE html>
<script>
    <?php
    /**
     * Session
     */
    session_start();
    if (!isset($_SESSION['status'])) {
        session_destroy();
    } elseif ($_SESSION['status'] == 0) {
        echo "alert('Not working.');";
    } elseif ($_SESSION['status'] == 1) {
        echo "alert('1 item added.');";
    } elseif ($_SESSION['status'] == 2) {
        echo "alert('1 item updated.');";
    } elseif ($_SESSION['status'] == 3) {
        echo "alert('1 item deleted.');";
    }
    session_destroy();

    /**
     * Session => status
     * 0: nothing
     * 1: create
     * 2: update
     * 3: delete
     */
    ?>
</script>