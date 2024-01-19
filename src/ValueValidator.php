<?
function isNotValid(mixed $field): bool {
    return !isset($field) || empty($field);
}

function isValid(mixed $field): bool {
    return isset($field) || !empty($field);
}

function isAttachmentValid(array $attachment): bool {
    return isset($attachment) && $attachment['error'] === UPLOAD_ERR_OK;
}
?>