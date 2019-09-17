import {PostService} from "../services";

export const PostAction = {
    getAll,
    getItem,
    addComment
};

/**
 * get all
 * @returns {Promise<T | never> | * | * | *}
 */
function getAll() {
    return PostService.getAll();
}

/**
 * get item
 * @returns {Promise<T | never> | * | * | *}
 */
function getItem(id) {
    return PostService.getItem(id);
}

/**
 * get item
 * @returns {Promise<T | never> | * | * | *}
 */
function addComment(postId, body) {
    return PostService.addComment(postId, body);
}
