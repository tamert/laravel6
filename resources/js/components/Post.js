import React, { Component } from 'react';
import {PostAction} from '../actions'
import { Link } from 'react-router-dom';

class Post extends Component {

    constructor(props) {
        super(props);
        console.log(this.props);
        this.state = {
            id: this.props.match.params.id,
            item : false,
            body : ""
        };
        this.sendComment = this.sendComment.bind(this);
        this.handleInputChange = this.handleInputChange.bind(this);
    }

    sendComment(event) {
        if(this.state.body) {
            event.preventDefault();
            PostAction.addComment(this.state.id, this.state.body).then( result => {
                alert('Yorumunuz Eklenmiştir.');
                this.setState({ "body": "" });
                return true;
            }, function(error) {

                console.log(error);
                if(error === "Unauthenticated.") {
                    alert('Yorum Yazmak için giriş yapınız');
                    window.location.replace("/login");

                }
            });
        } else {
            alert('Yorum kısmını boş bırakmayınız');
        }


    };

    handleInputChange(event) {
        this.setState({ "body": event.target.value });
    }

    componentWillMount() {

        PostAction.getItem(this.state.id).then( result => {
            this.setState({item: result});
        }, function(error) {
            this.setState({item: error});
        });
    }

    render() {
        let item = this.state.item;
        return (
            <div>
                    {
                        item &&
                                    <div className="row mb-4">
                                        <div className="col-md-12">
                                            <h3>{item.title}</h3>
                                            <small>{item.created_at} - {item.user.name}</small>
                                            <p>{item.body}</p>


                                            </div>
                                        <div className="col-md-12">
                                        <h4>Yorumlar</h4>
                                        <hr/>

                                        {(item.comment.length) ?
                                            <div>
                                                {item.comment.map((comment, index) => {
                                                    return(
                                                        <div key={index} className="alert alert-light">
                                                            <b>{comment.user.name} yazdı:</b>
                                                            <p>{comment.body}</p>
                                                        </div>
                                                    )
                                                })}
                                            </div>
                                            :
                                            <div className="text-center">Yorum yok</div>
                                        }

                                        </div>

                                        <div className="col-md-12">
                                            <h4>Yorumlar Yazın</h4>
                                            <hr/>

                                                <textarea type="email"
                                                       className="form-control"
                                                       aria-describedby="email"
                                                          value={this.state.body}
                                                          onChange={this.handleInputChange}
                                                       name="body"
                                                       placeholder="lütfen birşeyler yazın"
                                                       autoComplete="off"
                                                />

                                            <br/>
                                            <a href="#" onClick={this.sendComment} className="btn btn-primary">  Gönder </a>

                                        </div>
                                        </div>
                    }
            </div>
        );
    }
}


export default Post;
