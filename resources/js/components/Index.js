import React, { Component } from 'react';
import ReactDOM from "react-dom";
import { HashRouter as Router, Switch } from 'react-router-dom';
import AppRoute from "../layouts/AppRoute";
import DefaultLayout from "../layouts/DefaultLayout";
import Home from "./Home";
import Post from "./Post";

class Index extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="App">
                <Router>
                    <Switch>
                        <AppRoute exact path="/"
                                  component={Home}
                                  auth={false}
                                  layout={DefaultLayout}
                        />
                        <AppRoute exact path="/post/:id"
                                  component={Post}
                                  auth={false}
                                  layout={DefaultLayout}
                        />
                    </Switch>
                </Router>
            </div>
        );
    }
}

export default Index;

if (document.getElementById('example')) {
    ReactDOM.render(<Index />, document.getElementById('example'));
}
