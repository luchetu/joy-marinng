import React from "react";
import { HashRouter as Router, Link, Route, Switch } from "react-router-dom";
import Login from "./components/login/Login";
import AuthenticatedRoute from "./AuthenticatedRoute";
import Dashboard from "./components/pages/Dashboard";
import ListPosts from "./components/pages/posts/Index";
import AddPosts from "./components/pages/posts/Add";
import EditPosts from "./components/pages/posts/Edit";
import ListTags from "./components/pages/tags/Index";
import AddTags from "./components/pages/tags/Add";
import EditTags from "./components/pages/tags/Edit";

class Routes extends React.Component {
    render() {
        return (
            <Switch>
                <Route exact path="/login" component={Login} />
                <AuthenticatedRoute exact path="/" component={Dashboard} />
                <AuthenticatedRoute exact path="/posts" component={ListPosts} />
                <AuthenticatedRoute path="/posts/add" component={AddPosts} />
                <AuthenticatedRoute
                    path="/posts/edit/:id"
                    component={EditPosts}
                />
                <AuthenticatedRoute exact path="/tags" component={ListTags} />
                <AuthenticatedRoute path="/tags/add" component={AddTags} />
                <AuthenticatedRoute
                    path="/tags/edit/:id"
                    component={EditTags}
                />

            </Switch>
        );
    }
}

export default Routes;
