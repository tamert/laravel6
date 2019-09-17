import React, { Component } from 'react';
import {PostAction} from '../actions'
import { Link } from 'react-router-dom';

class Home extends Component {

    constructor(props) {
        super(props);
        this.state = {
            items : false
        };

    }

    componentWillMount() {
        PostAction.getAll().then( result => {
            this.setState({items: result});
        }, function(error) {
            this.setState({items: error});
        });
    }

    render() {
        return (
            <div className="row">

                <h2>Hoş Geldiniz</h2>
                <hr/>
                <div className="row">
                    <div className="col-md-12">
                    {
                        this.state.items && this.state.items
                            .map((item, index) => {
                                return (

                                            <div className="card  mb-4" key={index}>
                                                <div className="card-header">{item.title}</div>
                                                <div className="card-body">
                                                    <p>{item.body}</p>
                                                    <br/>
                                                    <Link to={"/post/"+ item.id} className=" float-right btn btn-sm btn-primary"> Detay </Link>
                                                </div>
                                                <div className="card-footer">{item.created_at} - {item.user.name} </div>
                                            </div>

                                );
                            })
                    }
                    </div>
                </div>
            </div>
        );
    }
}


export default Home;
