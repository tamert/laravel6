import React from 'react';
import {Route} from 'react-router-dom';

const AppRoute = ({component: Component, data: data, auth: auth, layout: Layout, ...rest}) => {
    return (
        <Route {...rest} render={props => {
            return <Layout><Component {...props} {...data} /></Layout>;
        }}/>
    );
};

export default AppRoute;
