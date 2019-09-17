import api from '../utils/api';


const API_POST = "post";
const API_COMMENT = "comment/add";

export const PostService = {
    getAll,
    getItem,
    addComment
};

/**
 * get all
 * @returns {Q.Promise<never> | * | Promise<any> | undefined}
 */
function getAll() {
    return api.get(API_POST).then(response => {
        return response;
    }).catch(error => {
        let errorData = error.response;
        return Promise.reject((errorData && errorData.data.message) || errorData.statusText);
    });
}

/**
 * get item
 * @returns {Promise<T | never> | * | * | *}
 */
function getItem(id) {
    return api.get(API_POST+ "/"+ id).then(response => {
        return response;
    }).catch(error => {
        let errorData = error.response;
        return Promise.reject((errorData && errorData.data.message) || errorData.statusText);
    });
}

/**
 * add comment
 * @param postId
 * @param body
 * @returns {Q.Promise<never> | * | Promise<any> | undefined}
 */
function addComment(postId, body) {
    const data = new FormData();
    data.append('post_id', postId);
    data.append('body', body);
    data.append('_method', 'PATCH');

    return api.post(API_COMMENT, data).then(response => {
        return response;
    }).catch(error => {
        let errorData = error.response;
        return Promise.reject((errorData && errorData.data.message) || errorData.statusText);
    });
}
