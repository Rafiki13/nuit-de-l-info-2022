using UnityEngine;

namespace NDIGame
{

    public class Waypoint
    {

        private int[] paths;

        private Vector2 position;

        public Waypoint(Vector2 position, int[] paths)
        {
            this.position = position;
            this.paths = paths;
        }

        public int[] Paths => paths;

        private Vector2 Position => position;

    }

}
