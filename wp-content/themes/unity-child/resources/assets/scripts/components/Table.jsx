import React, { Component, Fragment } from 'react';
import PropTypes from 'prop-types';

const Arrow = ({ sortDir, isCurrent }) => {
  let ascending = sortDir === 'ascending';
  return (
    <svg viewBox="0 0 100 200" width="100" height="200">
      {!(!ascending && isCurrent) && <polyline points="20 50, 50 20, 80 50" />}
      <line x1="50" y1="20" x2="50" y2="180" />
      {!(ascending && isCurrent) && (
        <polyline points="20 150, 50 180, 80 150" />
      )}
    </svg>
  );
};

class Table extends Component {
  render() {
    const captionID = 'caption-' + Math.random().toString(36).substr(2, 9);

    return (
      <Fragment>
        <div className="table-container" aria-labelledby={captionID} role="group">
          <table>
            <caption id={captionID} className="screen-reader-text"></caption>
            <thead>
              <tr>
                {this.props.headers.map((header, i) => (
                  <th role="columnheader" scope="col" key={i} className={header[0]} aria-sort="">
                    {header[0]}
                    {header[0] === 'title' && (
                    <button onClick={() => this.props.handleTableSort(header[0])}>
                      <Arrow sortDir={this.props.sortDir} isCurrent={this.props.sortedBy === header[0]} />
                        <span className="screen-reader-text">sort by {header[0]} in {this.props.sortDir !== 'ascending' ? 'ascending' : 'descending'} order</span>
                    </button>
                    )}
                  </th>
                ))}
              </tr>
            </thead>
            <tbody>
              {this.props.rows.map((row, i) => (
                <tr key={i}>
                  <td role="rowheader" scope="row"><a className="fw-600" href={row.url}>{row.title}</a></td>
                  <td>{row.eligibility}</td>
                  <td>{row.amount}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </Fragment>
    );
  }
}

/**
 * Props validation.
 */
Table.propTypes = {
  caption: PropTypes.string,
  headers: PropTypes.array,
  rows: PropTypes.array,
};

export default Table;
