import Component from 'flarum/common/Component';
import Tooltip from 'flarum/common/components/Tooltip';

export default class PostCountBadge extends Component {
  view() {
    const userPosts = this.attrs.posts;
    const userClass = this.attrs.userClass;
    const userBadgeLabel = this.attrs.label;
    const userBadgeStyle = this.attrs.style;
    return (
      <span>
        <Tooltip text={userPosts + ' 次回帖'}>
          <span className={userBadgeStyle}>
            <i class={userClass + ' autopost'} />
            {userBadgeLabel}
          </span>
        </Tooltip>
      </span>
    );
  }
}
