import React from 'react';
import PropTypes from 'prop-types';

const DefaultLayout = ({children}) => {

    return (
        <div>
            <div className="container-fluid main-content">
                {children}
            </div>
        </div>
    );
};

DefaultLayout.propTypes = {
    children: PropTypes.node.isRequired
};

export default DefaultLayout;

